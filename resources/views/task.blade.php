<x-app>
  <p>タスクをを追加する</p>
  <form action="task_create" method="post">
    @csrf
    <p>タイトル</p>
    <div>
      <input type="text" name="task_name" id="task_name" class="w-100">
    </div>
    <p>期限</p>
    <div>
      <input type="date" name="deadline" id="deadline" class="w-100">
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