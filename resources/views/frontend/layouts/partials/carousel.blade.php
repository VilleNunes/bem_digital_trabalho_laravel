<section class="relative w-full h-[80vh] flex items-center justify-center overflow-hidden">
  <!-- Vídeo de fundo -->
  <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover">
    <source src="videos/videosfundo.mp4" type="video/mp4">
    Seu navegador não suporta vídeos em HTML5.
  </video>

  <!-- Sobreposição escura -->
  <div class="absolute inset-0 bg-black bg-opacity-30"></div>

  <!-- Conteúdo -->
  <div class="relative z-10 text-center text-white">
    <h1 class="text-5xl md:text-6xl font-extrabold mb-8">
      O FUTURO <span id="palavra" class="text-green-500 transition-all duration-700">PASSA</span> AQUI
    </h1>
    <a href="videos/videosfundo.mp4" target="_blank"
      class="inline-flex items-center gap-2 px-6 py-3 border border-white rounded-full text-white font-medium hover:bg-white hover:text-black transition">
      Assista o vídeo completo
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M14.752 11.168l-5.197-2.987A1 1 0 008 9.05v5.9a1 1 0 001.555.868l5.197-2.987a1 1 0 000-1.736z" />
      </svg>
    </a>
  </div>
</section>

<script>
  const palavras = ["PASSA", "ESTÁ", "COMEÇA"];
  const palavraEl = document.getElementById("palavra");
  let i = 0;
  setInterval(() => {
    palavraEl.textContent = palavras[i];
    i = (i + 1) % palavras.length;
  }, 2000);
</script>