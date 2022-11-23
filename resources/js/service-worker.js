import { precacheAndRoute } from "workbox-precaching";
import { registerRoute, NavigationRoute, Route } from "workbox-routing";
import {
    StaleWhileRevalidate,
    NetworkFirst,
    CacheFirst,
} from "workbox-strategies";
import { ExpirationPlugin } from "workbox-expiration";

/**
 * Initialization
 */

// Masa kadarluarsa cache
const days = 1;
const expirationCache = new ExpirationPlugin({
    maxAgeSeconds: days * 24 * 60 * 60,
});
const NEW_CACHE_VERSION = "v1.0.0";

precacheAndRoute(self.__WB_MANIFEST || []);

const navigationRoute = new NavigationRoute(
    new NetworkFirst({
        cacheName: `home-runtime-cache1`,
        plugins: [expirationCache],
    }),
    {
        allowlist: [
            // Login/Register Page
            new RegExp("/"),
            new RegExp("/register"),
            new RegExp("/home"),
        ],
        denylist: [],
    }
);

// Handle images:
const imageRoute = new Route(
    ({ request }) => {
        return request.destination === "image";
    },
    new CacheFirst({
        cacheName: `images-runtime-cache-${NEW_CACHE_VERSION}`,
        plugins: [expirationCache],
    })
);

// Handle scripts:
const scriptsRoute = new Route(
    ({ request }) => {
        return request.destination === "script";
    },
    new StaleWhileRevalidate({
        cacheName: `scripts-runtime-cache-${NEW_CACHE_VERSION}`,
        plugins: [expirationCache],
    })
);

// Handle styles:
const stylesRoute = new Route(
    ({ request }) => {
        return request.destination === "style";
    },
    new StaleWhileRevalidate({
        cacheName: `styles-runtime-cache-${NEW_CACHE_VERSION}`,
        plugins: [expirationCache],
    })
);

// Handle fonst:
const fontsRoute = new Route(
    ({ request }) => {
        return request.destination === "font";
    },
    new CacheFirst({
        cacheName: `fonts-runtime-cache-${NEW_CACHE_VERSION}`,
        plugins: [expirationCache],
    })
);

self.addEventListener("activate", function (e) {
    e.waitUntil(
        caches.keys().then(function (oldCacheKeys) {
            return Promise.all(
                oldCacheKeys
                    .filter(
                        (oldCacheKey) =>
                            !oldCacheKey.includes(NEW_CACHE_VERSION)
                    )
                    .map((oldCacheKey) => caches.delete(oldCacheKey))
            );
        })
    );
});

registerRoute(imageRoute);
registerRoute(scriptsRoute);
registerRoute(stylesRoute);
registerRoute(fontsRoute);
registerRoute(navigationRoute);
