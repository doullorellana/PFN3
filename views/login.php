<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS TailWindcss CLI -->
    <link href="../css/output.css" rel="stylesheet">

    <title>University | Funval</title>
</head>

<body class="bg-[#FFF5D2]">

    <div class="flex min-h-full flex-col rounded justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="object-cover h-48 w-96" src="/assets/logo.jpg" alt="University | Funval">
        </div>

        <div class="bg-white shadow-lg sm:rounded-xl sm:mx-auto max-w-md px-8 pt-0 pb-10 mb-2 mt-5">

            <h2 class="mt-10 text-center text-2xl leading-9 tracking-tight text-gray-900">Bienvenido ingresa con tu cuenta</h2>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm rounded">
                <form class="space-y-6" action="/login" method="POST">
                    <div>
                        <!--<label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>-->
                        <div class="mt-2">
                            <input id="email" name="email" type="email" placeholder="Email" autocomplete="email" required class="block w-full pl-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <!--<div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div>
                    </div>-->
                        <div class="mt-2">

                            <input id="password" name="password" type="password" placeholder="Password" autocomplete="current-password" required class="block w-full pl-4 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ingresar</button>
                    </div>
                </form>

            </div>
        </div>

    </div>

</body>

</html>