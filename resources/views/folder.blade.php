<x-app>
  <p>フォルダを追加する</p>
  <p>フォルダ名</p>
  <form action="{{ route('folder_create') }}" method="post">
    @csrf
    <div>
      <input type="text" name="folder_name" id="folder_name" class="w-100">
    </div>
    <div class="d-flex justify-content-end">
      <input type="submit" value="送信">
    </div>
  </form>
  @if ($errors->any())
    <div>
      <ul>
        @foreach ($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
</x-app>