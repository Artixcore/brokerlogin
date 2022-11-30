<div class="card">
    <div class="card-body">
        <button class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" data-bs-toggle="modal" data-bs-target="#document" type="submit">Neues Dokument</button>
        <a class="btn btn-outline-default" href="{{ route('admin.e_page', $user->id) }}" style="color:#000000; background-color:#D3D3D3">Fixkosten</a>
        <a class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" href="{{ route('admin.apps', $user->id) }}">Verträge</a>
        <a class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" href="{{ route('admin.agent.contact', $user->id) }}" type="submit">Kontakte</a>
        <a class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" href="{{ route('admin.agent.total', $user->id) }}" type="submit">Abrechnung erstellen</a>
        <a class="btn btn-outline-default" style="color:#000000; background-color:#D3D3D3" href="{{ route('admin.agent.total.grand', $user->id) }}" type="submit">Auszahlen</a>
    </div>
</div>
