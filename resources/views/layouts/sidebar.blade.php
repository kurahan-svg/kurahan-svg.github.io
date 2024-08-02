
<div class="bg-dark border-right" id="sidebar-wrapper" style="height: 100vh; overflow-y: auto;">
            <div class="list-group list-group-flush">
                <a href="{{ route('material') }}" class="list-group-item list-group-item-action bg-dark text-white  {{ Request::is('material') ? 'active' : '' }}">Material</a>
                <a href="{{ route('tambah-material') }}" class="list-group-item list-group-item-action bg-dark text-white">Tambah Material</a>
                <a href="{{ route('AlatBerat') }}" class="list-group-item list-group-item-action bg-dark text-white">Alat Berat</a>
                <a href="{{ route('Talatberat') }}" class="list-group-item list-group-item-action bg-dark text-white">Tambah Alat Berat</a>
                <a href="{{ route('alat') }}" class="list-group-item list-group-item-action bg-dark text-white">Alat Kontruksi Ringan</a>
                <a href="{{ route('Talat') }}" class="list-group-item list-group-item-action bg-dark text-white">Tambah Alat Kontruksi Ringan</a>
            </div>
        </div>
