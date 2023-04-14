<div class="max-w-7xl mx-auto p-8">
    <x-splade-table :for="$users" striped>
        @cell('action', $user)
            <Link href="/users/edit/{{ $user->id }}" class="font-bold text-indigo-600">
                Edit
            </Link>
        @endcell
    </x-splade-table>
</div>