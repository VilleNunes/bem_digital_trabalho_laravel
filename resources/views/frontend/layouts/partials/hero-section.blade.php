<section id="impacto" 
    class="py-24 bg-white dark:bg-gray-800 text-center transition-colors duration-500 opacity-0 translate-y-16 transition-all duration-700 ease-out">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-4xl font-extrabold mb-12">Nosso Impacto em Números</h2>
        <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-16">
            Conectamos pessoas, empresas e instituições para transformar vidas através da doação consciente e transparente.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="stat bg-gray-50 dark:bg-gray-900 rounded-xl p-10 shadow-md transition-transform duration-700">
                <div class="stat-title text-gray-500">Anos de Atuação</div>
                <div class="stat-value text-primary mt-1 mb-1">5+</div>
                <div class="stat-desc">Transformando realidades desde 2020</div>
            </div>
            <div class="stat bg-gray-50 dark:bg-gray-900 rounded-xl p-10 shadow-md transition-transform duration-700">
                <div class="stat-title text-gray-500 text-base">Doações Realizadas</div>
                <div class="stat-value text-primary mt-1 mb-1">+12K</div>
                <div class="stat-desc">Pessoas impactadas diretamente</div>
            </div>
            <div class="stat bg-gray-50 dark:bg-gray-900 rounded-xl p-10 shadow-md transition-transform duration-700">
                <div class="stat-title text-gray-500">Instituições Ativas</div>
                <div class="stat-value text-primary mt-1 mb-1">180+</div>
                <div class="stat-desc">Parceiros cadastrados em todo o Brasil</div>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes bounceUp {
  0% {
    transform: translateY(50px);
    opacity: 0;
  }
  60% {
    transform: translateY(-15px);
    opacity: 1;
  }
  80% {
    transform: translateY(5px);
  }
  100% {
    transform: translateY(0);
  }
}
.animate-bounceUp {
  animation: bounceUp 0.8s ease-out forwards;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const section = document.querySelector("#impacto");
  const cards = section.querySelectorAll(".stat");

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        section.classList.add("opacity-100", "translate-y-0");
        section.classList.remove("opacity-0", "translate-y-16");

        cards.forEach((card, index) => {
          setTimeout(() => {
            card.classList.add("animate-bounceUp");
          }, index * 150); // atraso entre cada card
        });

        observer.unobserve(section); // anima só uma vez
      }
    });
  }, { threshold: 0.2 });

  observer.observe(section);
});
</script>
