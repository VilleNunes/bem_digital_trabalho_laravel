<!DOCTYPE html>
<html class="light" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Bem Digital</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;700;900&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script>
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "primary": "#13ec5b",
                    "background-light": "#f6f8f6",
                    "background-dark": "#102216",
                },
                fontFamily: {
                    "display": ["Public Sans"]
                },
                borderRadius: {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
                },
            },
        },
    }
    </script>
    <style>
    .material-symbols-outlined {
        font-variation-settings: 'FILL'0, 'wght'400, 'GRAD'0, 'opsz'24;
    }

    .social-icon:hover {
        color: #13ec5b;
    }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-[#343A40] dark:text-gray-200">
    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
        <div class="flex h-full grow flex-col">
            <header class="w-full bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-sm sticky top-0 z-50">
                <div class="container mx-auto max-w-6xl">
                    <div
                        class="flex items-center justify-between whitespace-nowrap border-b border-solid border-gray-200 dark:border-gray-700 px-4 md:px-10 py-3">
                        <div class="flex items-center gap-4 text-[#0d1b12] dark:text-white">
                            <div class="text-primary size-7">
                                <svg fill="currentColor" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_6_543)">
                                        <path
                                            d="M42.1739 20.1739L27.8261 5.82609C29.1366 7.13663 28.3989 10.1876 26.2002 13.7654C24.8538 15.9564 22.9595 18.3449 20.6522 20.6522C18.3449 22.9595 15.9564 24.8538 13.7654 26.2002C10.1876 28.3989 7.13663 29.1366 5.82609 27.8261L20.1739 42.1739C21.4845 43.4845 24.5355 42.7467 28.1133 40.548C30.3042 39.2016 32.6927 37.3073 35 35C37.3073 32.6927 39.2016 30.3042 40.548 28.1133C42.7467 24.5355 43.4845 21.4845 42.1739 20.1739Z"
                                            fill="currentColor"></path>
                                        <path clip-rule="evenodd"
                                            d="M7.24189 26.4066C7.31369 26.4411 7.64204 26.5637 8.52504 26.3738C9.59462 26.1438 11.0343 25.5311 12.7183 24.4963C14.7583 23.2426 17.0256 21.4503 19.238 19.238C21.4503 17.0256 23.2426 14.7583 24.4963 12.7183C25.5311 11.0343 26.1438 9.59463 26.3738 8.52504C26.5637 7.64204 26.4411 7.31369 26.4066 7.24189C26.345 7.21246 26.143 7.14535 25.6664 7.1918C24.9745 7.25925 23.9954 7.5498 22.7699 8.14278C20.3369 9.32007 17.3369 11.4915 14.4142 14.4142C11.4915 17.3369 9.32007 20.3369 8.14278 22.7699C7.5498 23.9954 7.25925 24.9745 7.1918 25.6664C7.14534 26.143 7.21246 26.345 7.24189 26.4066ZM29.9001 10.7285C29.4519 12.0322 28.7617 13.4172 27.9042 14.8126C26.465 17.1544 24.4686 19.6641 22.0664 22.0664C19.6641 24.4686 17.1544 26.465 14.8126 27.9042C13.4172 28.7617 12.0322 29.4519 10.7285 29.9001L21.5754 40.747C21.6001 40.7606 21.8995 40.931 22.8729 40.7217C23.9424 40.4916 25.3821 39.879 27.0661 38.8441C29.1062 37.5904 31.3734 35.7982 33.5858 33.5858C35.7982 31.3734 37.5904 29.1062 38.8441 27.0661C39.879 25.3821 40.4916 23.9425 40.7216 22.8729C40.931 21.8995 40.7606 21.6001 40.747 21.5754L29.9001 10.7285ZM29.2403 4.41187L43.5881 18.7597C44.9757 20.1473 44.9743 22.1235 44.6322 23.7139C44.2714 25.3919 43.4158 27.2666 42.252 29.1604C40.8128 31.5022 38.8165 34.012 36.4142 36.4142C34.012 38.8165 31.5022 40.8128 29.1604 42.252C27.2666 43.4158 25.3919 44.2714 23.7139 44.6322C22.1235 44.9743 20.1473 44.9757 18.7597 43.5881L4.41187 29.2403C3.29027 28.1187 3.08209 26.5973 3.21067 25.2783C3.34099 23.9415 3.8369 22.4852 4.54214 21.0277C5.96129 18.0948 8.43335 14.7382 11.5858 11.5858C14.7382 8.43335 18.0948 5.9613 21.0277 4.54214C22.4852 3.8369 23.9415 3.34099 25.2783 3.21067C26.5973 3.08209 28.1187 3.29028 29.2403 4.41187Z"
                                            fill="currentColor" fill-rule="evenodd"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_6_543">
                                            <rect fill="white" height="48" width="48"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <h2
                                class="text-[#0d1b12] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">
                                Bem Digital</h2>
                        </div>
                        <div class="hidden md:flex flex-1 justify-end gap-8">
                            <div class="flex items-center gap-9">
                                <a class="text-[#343A40] dark:text-gray-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary transition-colors"
                                    href="#">Home</a>
                                <a class="text-[#343A40] dark:text-gray-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary transition-colors"
                                    href="#">Doar</a>
                                <a class="text-[#343A40] dark:text-gray-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary transition-colors"
                                    href="#">Sobre</a>
                                <a class="text-[#343A40] dark:text-gray-300 text-sm font-medium leading-normal hover:text-primary dark:hover:text-primary transition-colors"
                                    href="#">Instituições</a>
                            </div>
                            <div class="flex gap-2">
                                <button
                                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-[#0d1b12] text-sm font-bold leading-normal tracking-[0.015em] hover:opacity-90 transition-opacity">
                                    <span class="truncate">Registro</span>
                                </button>
                                <button
                                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-gray-200/80 dark:bg-gray-700/80 text-[#0d1b12] dark:text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-gray-300/80 dark:hover:bg-gray-600/80 transition-colors">
                                    <span class="truncate">Login</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <main class="flex flex-col items-center">
                <div class="w-full max-w-6xl px-4 md:px-10 py-5">
                    <div class="flex flex-col gap-4">
                        <div class="text-center">
                            <h1
                                class="text-[#0d1b12] dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">
                                Nossas Campanhas</h1>
                            <p
                                class="text-gray-600 dark:text-gray-400 text-base font-normal leading-normal max-w-lg mx-auto mt-2">
                                Veja o impacto que fazemos juntos. Sua contribuição fortalece iniciativas e transforma
                                realidades.</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
                            <div
                                class="group relative flex flex-col items-center justify-center gap-3 overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 bg-background-light dark:bg-background-dark p-6 text-center shadow-sm hover:shadow-lg transition-shadow duration-300">
                                <span class="material-symbols-outlined text-primary text-6xl">school</span>
                                <h3 class="text-xl font-bold leading-tight text-[#0d1b12] dark:text-white mt-2">Impacto:
                                    Educação</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-base font-normal leading-normal">Mais de
                                    <span class="font-bold text-primary">10K alunos</span> beneficiados.
                                </p>
                                <button
                                    class="flex items-center justify-center self-center rounded-lg bg-primary px-4 py-2 text-sm font-bold text-[#0d1b12] transition-opacity hover:opacity-90 mt-2">
                                    <span class="truncate">Saiba Mais</span>
                                </button>
                            </div>
                            <div
                                class="group relative flex flex-col items-center justify-center gap-3 overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 bg-background-light dark:bg-background-dark p-6 text-center shadow-sm hover:shadow-lg transition-shadow duration-300">
                                <span class="material-symbols-outlined text-primary text-6xl">pets</span>
                                <h3 class="text-xl font-bold leading-tight text-[#0d1b12] dark:text-white mt-2">Suporte:
                                    Animais</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-base font-normal leading-normal"><span
                                        class="font-bold text-primary">2.5K resgates</span> de animais.</p>
                                <button
                                    class="flex items-center justify-center self-center rounded-lg bg-primary px-4 py-2 text-sm font-bold text-[#0d1b12] transition-opacity hover:opacity-90 mt-2">
                                    <span class="truncate">Saiba Mais</span>
                                </button>
                            </div>
                            <div
                                class="group relative flex flex-col items-center justify-center gap-3 overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 bg-background-light dark:bg-background-dark p-6 text-center shadow-sm hover:shadow-lg transition-shadow duration-300">
                                <span class="material-symbols-outlined text-primary text-6xl">eco</span>
                                <h3 class="text-xl font-bold leading-tight text-[#0d1b12] dark:text-white mt-2">Meta:
                                    Reflorestamento</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-base font-normal leading-normal"><span
                                        class="font-bold text-primary">50 mil árvores</span> plantadas.</p>
                                <button
                                    class="flex items-center justify-center self-center rounded-lg bg-primary px-4 py-2 text-sm font-bold text-[#0d1b12] transition-opacity hover:opacity-90 mt-2">
                                    <span class="truncate">Saiba Mais</span>
                                </button>
                            </div>
                            <div
                                class="group relative flex flex-col items-center justify-center gap-3 overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 bg-background-light dark:bg-background-dark p-6 text-center shadow-sm hover:shadow-lg transition-shadow duration-300">
                                <span class="material-symbols-outlined text-primary text-6xl">medical_services</span>
                                <h3 class="text-xl font-bold leading-tight text-[#0d1b12] dark:text-white mt-2">Acesso:
                                    Saúde</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-base font-normal leading-normal"><span
                                        class="font-bold text-primary">500K consultas</span> subsidiadas.</p>
                                <button
                                    class="flex items-center justify-center self-center rounded-lg bg-primary px-4 py-2 text-sm font-bold text-[#0d1b12] transition-opacity hover:opacity-90 mt-2">
                                    <span class="truncate">Saiba Mais</span>
                                </button>
                            </div>
                            <div
                                class="group relative flex flex-col items-center justify-center gap-3 overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 bg-background-light dark:bg-background-dark p-6 text-center shadow-sm hover:shadow-lg transition-shadow duration-300">
                                <span class="material-symbols-outlined text-primary text-6xl">volunteer_activism</span>
                                <h3 class="text-xl font-bold leading-tight text-[#0d1b12] dark:text-white mt-2">Ajuda:
                                    Comunidade</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-base font-normal leading-normal"><span
                                        class="font-bold text-primary">800 famílias</span> assistidas.</p>
                                <button
                                    class="flex items-center justify-center self-center rounded-lg bg-primary px-4 py-2 text-sm font-bold text-[#0d1b12] transition-opacity hover:opacity-90 mt-2">
                                    <span class="truncate">Saiba Mais</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <h2
                        class="text-[#0d1b12] dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-10">
                        Instituições em Destaque</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
                        <div class="flex flex-col gap-3 pb-3">
                            <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg"
                                data-alt="A brightly lit community center with people of all ages engaging in various activities."
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCrBNGGc5vOd7GWuxbIyxa8ZTCq-kufq3C91YLqxVR4Spng3FyZpFP9zarGiriizkiSTl3s7Ajh7dk60jOmlUKXmIpm5A1-x5BjH-sQHTR9aJAs-9xZCfRyy54MbQRGc0qDYRwkhqu3mx00vyDtp-sqdWU84tteOfQW-cX8Aija_5lqPLJO1vdN8_TqseRb3aZYkMA1r2IDxs2xy-XSd71c5ZfRvFSd8hbsX0cyuvCcbX_40Tume34WjpC576pcvm-vLZJ8Uj0tcbQ");'>
                            </div>
                            <div>
                                <p class="text-[#0d1b12] dark:text-white text-base font-medium leading-normal">
                                    Instituições que mais recebem doações</p>
                                <p class="text-gray-600 dark:text-gray-400 text-sm font-normal leading-normal">Conheça
                                    as organizações que estão recebendo um grande apoio da nossa comunidade.</p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 pb-3">
                            <div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg"
                                data-alt="A small, local animal shelter with a volunteer caring for puppies, indicating need for support."
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCOaUxER2kDk3u3XMrV4eANgaO6P70cZ8vt3cEgmsNDd1nd2xQ2Ez3hKKu_N2--x10StfDclzcVWKYuDSNr7ihQ9qW8JQ1M67WFKG2-If9CIQ7PVztCqgF9rtxF4PiTJCTUFSl9DKb1OSSLvyfgxUw1zK4m8rrXf7Z-kfpbAT2IjQ2FxL87SxpElFC8XU0nj-ImXjK9Omt8XiNonCm1bLUyDJHwhQQANFso1Bio-x6OSde2kl6I_yJo7UNBrJPxfgLOx2JtHfAsJgc");'>
                            </div>
                            <div>
                                <p class="text-[#0d1b12] dark:text-white text-base font-medium leading-normal">
                                    Instituições que menos recebem doações</p>
                                <p class="text-gray-600 dark:text-gray-400 text-sm font-normal leading-normal">Essas
                                    organizações precisam da sua ajuda para continuar seu trabalho vital.</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-10 px-4 py-10 @container">
                        <div class="flex flex-col gap-4">
                            <h1
                                class="text-[#0d1b12] dark:text-white tracking-light text-[32px] font-bold leading-tight @[480px]:text-4xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em] max-w-[720px]">
                                Sobre a Bem Digital
                            </h1>
                            <p
                                class="text-[#343A40] dark:text-gray-300 text-base font-normal leading-normal max-w-[720px]">
                                Somos um hub centralizado para instituições de doação, conectando doadores generosos com
                                causas que importam. Nossa missão é facilitar a doação e garantir a transparência,
                                maximizando o impacto de cada contribuição.
                            </p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-0">
                            <div
                                class="flex flex-1 gap-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-background-light dark:bg-background-dark p-4 flex-col">
                                <div class="text-primary">
                                    <span class="material-symbols-outlined" style="font-size: 32px;">hub</span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h2 class="text-[#0d1b12] dark:text-white text-base font-bold leading-tight">Conexão
                                        Direta</h2>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm font-normal leading-normal">
                                        Conectamos você diretamente às instituições que precisam de ajuda.</p>
                                </div>
                            </div>
                            <div
                                class="flex flex-1 gap-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-background-light dark:bg-background-dark p-4 flex-col">
                                <div class="text-primary">
                                    <span class="material-symbols-outlined" style="font-size: 32px;">visibility</span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h2 class="text-[#0d1b12] dark:text-white text-base font-bold leading-tight">
                                        Transparência Total</h2>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm font-normal leading-normal">
                                        Acompanhe o impacto da sua doação e veja a diferença que você faz.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="w-full bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 mt-auto">
                <div class="container mx-auto max-w-6xl px-4 md:px-10 py-8">
                    <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left gap-6">
                        <div class="flex flex-col gap-2">
                            <h3 class="font-bold text-lg text-[#0d1b12] dark:text-white">Bem Digital</h3>
                            <p class="text-sm">Email: contato@bemdigital.com</p>
                            <p class="text-sm">Telefone: (11) 99999-9999</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <a aria-label="Facebook" class="social-icon text-gray-500 dark:text-gray-400" href="#">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v2.385z">
                                    </path>
                                </svg>
                            </a>
                            <a aria-label="Instagram" class="social-icon text-gray-500 dark:text-gray-400" href="#">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.85s-.012 3.584-.07 4.85c-.148 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.584-.012-4.85-.07c-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.85s.012-3.584.07-4.85c.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.85-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.947s-.014-3.667-.072-4.947c-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.689-.073-4.948-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4s1.791-4 4-4 4 1.79 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44 1.441-.645 1.441-1.44-.645-1.44-1.441-1.44z">
                                    </path>
                                </svg>
                            </a>
                            <a aria-label="LinkedIn" class="social-icon text-gray-500 dark:text-gray-400" href="#">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div
                        class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 text-center text-sm text-gray-500 dark:text-gray-400">
                        <p>© 2024 Bem Digital. Todos os direitos reservados.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
