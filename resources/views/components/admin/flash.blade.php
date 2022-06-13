@if(session()->has('message'))
    <div class="fixed bg-slate-800 px-5 py-5 right-10 bottom-10 rounded w-96 flex flex-row items-start justify-between"
         x-data="{show: true}"
         x-show="show"
         x-init="setTimeout(() => show = false, 3000)">
        <p class="font-bold text-slate-100">{{ session()->get('message') }}</p>
        <button @click="show = !show" class="text-slate-100 ml-4">X</button>
    </div>
@endif
