<x-app-layout title="Home">
    <!-- Jumbotron -->
    <livewire:hero />
    <!-- Agenda -->
    <livewire:agenda isHome="1" />
    <!-- Article -->
    <livewire:article isHome="1" />
    <!-- Layanan -->
    <section class="container px-4 mx-auto my-5 md:my-8 ">
        <h2 class="mb-1 text-3xl font-semibold md:mb-2">Layanan</h2>
        <div
            class="grid items-center grid-cols-1 overflow-hidden rounded-lg md:grid-cols-2 xl:grid-cols-3 bg-slate-100">
            <div class="flex flex-col items-center justify-center p-4 space-y-1 border border-slate-200">
                <img src="assets/pray.svg" alt="pray" class="w-20 aspect-square">
                <div class="text-xl uppercase md:text-2xl">Ibadah</div>
                <p class="w-2/3 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                    maiores
                    eaque officia accusamus,
                    porro qui optio deserunt fugit iste voluptate?</p>
            </div>
            <div class="flex flex-col items-center justify-center p-4 space-y-1 border border-slate-200">
                <img src="assets/sedekah.svg" alt="pray" class="w-20 aspect-square">
                <div class="text-xl uppercase md:text-2xl">Sedekah</div>
                <p class="w-2/3 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                    maiores
                    eaque officia accusamus,
                    porro qui optio deserunt fugit iste voluptate?</p>
            </div>
            <div class="flex flex-col items-center justify-center p-4 space-y-1 border border-slate-200">
                <img src="assets/pengajian.svg" alt="pray" class="w-20 aspect-square">
                <div class="text-xl uppercase md:text-2xl">Pengajian</div>
                <p class="w-2/3 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                    maiores
                    eaque officia accusamus,
                    porro qui optio deserunt fugit iste voluptate?</p>
            </div>
            <div class="flex flex-col items-center justify-center p-4 space-y-1 border border-slate-200">
                <img src="assets/kurban.svg" alt="pray" class="w-20 aspect-square">
                <div class="text-xl uppercase md:text-2xl">Kurban</div>
                <p class="w-2/3 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                    maiores
                    eaque officia accusamus,
                    porro qui optio deserunt fugit iste voluptate?</p>
            </div>
            <div class="flex flex-col items-center justify-center p-4 space-y-1 border border-slate-200">
                <img src="assets/PHBI.svg" alt="pray" class="w-20 aspect-square">
                <div class="text-xl uppercase md:text-2xl">PHBI</div>
                <p class="w-2/3 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                    maiores
                    eaque officia accusamus,
                    porro qui optio deserunt fugit iste voluptate?</p>
            </div>
            <div class="flex flex-col items-center justify-center p-4 space-y-1 border border-slate-200">
                <img src="assets/dll.svg" alt="pray" class="w-20 aspect-square">
                <div class="text-xl uppercase md:text-2xl">DLL</div>
                <p class="w-2/3 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                    maiores
                    eaque officia accusamus,
                    porro qui optio deserunt fugit iste voluptate?</p>
            </div>
        </div>
    </section>
    <!-- Ustadz -->
    <livewire:ustaz isHome="1" />
    <!-- DKM -->
    <livewire:dkm isHome="1" />
    <!-- Kas -->
    <livewire:kas isHome="1" />
</x-app-layout>