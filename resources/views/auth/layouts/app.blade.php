<!DOCTYPE html>

<html lang="pt-BR" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bem Digital — conectando doadores e instituições com transparência e impacto.">
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/1077/1077012.png" />

```
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<!-- Tailwind + DaisyUI -->
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/daisyui@4.12.13/dist/full.min.js"></script>

<!-- Tailwind Config -->
<script>
  tailwind.config = {
    darkMode: 'class', 
    theme: {
      extend: {
        colors: {
          primary: "#10B981", 
          'primary-dark': '#059669',
          'neutral-bg': "#FCFCFC", 
          'light-bg': "#F3F4F6", 
          'text-dark': '#1F2937', 
          'text-light': '#E5E7EB', 
        },
        fontFamily: {
          sans: ["Public Sans", "sans-serif"],
        },
      },
    },
  };
</script>

<!-- Vite Assets -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Custom Styles -->
<style>
  .material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
  }
  body {
    font-family: 'Public Sans', sans-serif;
  }
  .image-fundo {
    background-image: url("{{ asset('login-background.svg') }}");
    background-size: cover;
  }
</style>

<title>@yield('title', 'Bem Digital | Conectando Solidariedade e Impacto')</title>
```

</head>
<body class="bg-light-bg text-text-dark dark:bg-gray-800 dark:text-text-light transition-colors duration-500 image-fundo">

```
@yield('content')
```

</body>
</html>
