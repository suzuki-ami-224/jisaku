<main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>ジャンル追加</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class ='panel-body'>
                            @if($errors->any())
                            <div class='alert alert-danger'>
                                <ul>
                                    @foreach($errors->all() as $message)
                                    <li>{{ $message }} </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <form action="/genre" method="post">
                            @csrf
                            <label for='type' class='mt-2'>ジャンル</label>
                                <input type='text' class='form-control' name='name'/>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
