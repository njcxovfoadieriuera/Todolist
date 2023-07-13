<x-app>
  <div class="d-flex">
    <div class="d-flex flex-column w-25">
      <p>フォルダ</p>
      <button onclick="location.href='{{ route('folder') }}'" type="button" class="btn btn-primary">フォルダを追加する</button>
      <a href="">プライベート</a>
      <a href="">仕事</a>
      <a href="">旅行</a>
    </div>
    <div class="w-75">
      <p>タスク</p>
      <div>
        <button onclick="location.href='{{ route('task') }}'" type="button" class="btn btn-primary">タスクを追加する</button>
        <div class="d-flex flex-column">
          <div class="d-flex justify-content-between">
            <p>タイトル</p>
            <div class="d-flex ">
              <p>状態</p>
              <p>期限</p>
            </div>
          </div>
          <div class="d-flex justify-content-between">
            <a href="">サンプルタスク１</a>
            <div class="d-flex">
              <p>着手中</p>
              <p>2023/07/11</p>
              <a href="{{ route('edit-task') }}">編集</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app>