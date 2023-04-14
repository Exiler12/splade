<div class="max-w-7xl mx-auto p-8">
    <h1 class="text-3xl mb-8"> Edit User: {{ $user->name }}</h1>

    <x-splade-form :default="$user" :action="route('user.update',$user)" class="space-y-4">
        <x-splade-input name="name" label="Name" />
        <x-splade-input name="email" label="Email address" />
        <x-splade-select name="country_code" :options="$countries" choices multiple/>
        <x-splade-submit />
    </x-splade-form>
</div>