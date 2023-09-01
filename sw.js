// Evento de instalação do Service Worker
self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open('cache-v1').then(function(cache) {
      return cache.addAll([
        '../visual.matchingbusiness.online/',
       
        // Adicione aqui outros recursos estáticos que você deseja armazenar em cache
      ]);
    })
  );
});

// Evento de ativação do Service Worker
self.addEventListener('activate', function(event) {
  // Limpar caches antigos, se necessário
});

// Evento fetch do Service Worker
self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request).then(function(response) {
      return response || fetch(event.request);
    })
  );
});