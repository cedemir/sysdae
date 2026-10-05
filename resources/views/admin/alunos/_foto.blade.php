@php $fotoAtual = isset($aluno) && $aluno->foto ? $aluno->foto->url : null; @endphp

<div class="form-group">
    <label>Foto do Aluno</label>
    <div class="d-flex align-items-center">
        <img id="fotoPreview" src="{{ $fotoAtual }}" alt="Foto do aluno"
             class="rounded border mr-3 {{ $fotoAtual ? '' : 'd-none' }}" style="width: 120px; height: 150px; object-fit: cover;">
        <div id="fotoVazia" class="rounded border mr-3 align-items-center justify-content-center text-muted bg-light {{ $fotoAtual ? 'd-none' : 'd-flex' }}"
             style="width: 120px; height: 150px; font-size: 3rem;">
            <i class="bi bi-person"></i>
        </div>
        <div>
            <input type="file" class="form-control-file @error('foto') is-invalid @enderror" name="foto" id="foto" accept="image/jpeg,image/png,image/webp">
            <small class="form-text text-muted">JPG, PNG ou WEBP, até 2 MB.{{ $fotoAtual ? ' Envie uma nova imagem para substituir a atual.' : '' }}</small>
        </div>
    </div>
    @error('foto')
    <div class="alert alert-danger mt-2">
        {{$message}}
    </div>
    @enderror
</div>

@section('scripts')
<script>
    document.getElementById('foto').addEventListener('change', function () {
        var arquivo = this.files[0];
        if (!arquivo) {
            return;
        }
        var preview = document.getElementById('fotoPreview');
        preview.src = URL.createObjectURL(arquivo);
        preview.classList.remove('d-none');
        document.getElementById('fotoVazia').classList.replace('d-flex', 'd-none');
    });
</script>
@endsection
