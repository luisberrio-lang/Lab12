<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('👥 Gestión de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-bold text-gray-800">Lista de Usuarios Registrados</h1>
                    {{-- Botón opcional para agregar usuario si implementas el método --}}
                    {{-- <a href="{{ route('usuarios.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">➕ Nuevo Usuario</a> --}}
                </div>

                <table class="min-w-full border border-gray-200 text-left text-sm rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Nombre</th>
                            <th class="px-4 py-2 border">Email</th>
                            {{-- Si no quieres la fecha, elimina esta columna --}}
                            <th class="px-4 py-2 border">Fecha de Registro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usuarios as $usuario)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-2 border">{{ $usuario->id }}</td>
                                <td class="px-4 py-2 border">{{ $usuario->name }}</td>
                                <td class="px-4 py-2 border">{{ $usuario->email }}</td>
                                <td class="px-4 py-2 border">{{ $usuario->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500">No hay usuarios registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
