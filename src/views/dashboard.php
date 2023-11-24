<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- CSS TailWindcss CLI -->
    <link href="../css/output.css" rel="stylesheet">

    <title>Dashboard</title>
</head>

<body>
    <main class="flex  flex-col h-screen ">
        <header class=" top-0 w-full p-4 text-xl text-center text-orange-300 shadow shadow-slate-900 bg-stone-900">
            Title
        </header>
        <section class=" flex-1  overflow-y-scroll p-3 m-1  grid grid-cols-11 gap-2">
            <article class="p-3 col-span-11 lg:col-span-3  bg-[#082916] shadow shadow-black  text-orange-400 ">
                Menú
            </article>
            <article class="p-3 col-span-11 lg:col-span-8 bg-red-700  shadow shadow-black text-white ">
                Content body
            </article>
        </section>
    </main>
</body>

</html>