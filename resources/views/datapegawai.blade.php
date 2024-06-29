<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1 class="text-center mb-4">Data Pegawai</h1>

    <div class="container">
    @if(Session::has('success'))
        <div class="pt-3">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
        @endif
      <a href="{{ url('tambahpegawai') }}" type="button" class="btn btn-success">Tambah+</a>
      <div class="row">
        <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">No Telpon</th>
          <th scope="col">Foto</th>
          <th scope="col">Di buat</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
      
        @php
        $no = 1;
        @endphp
      @foreach ($data as $row)
      <tr>
        <th scope="row">{{ $no++ }}</th>
        <td>{{ $row->nama }}</td>
        <td>{{ $row->jeniskelamin }}</td>
        <td>0{{ $row->notelpon }}</td>
        <td>
          <img src="{{ asset('fotopegawai/'.$row->foto) }}" alt="" style="width:40px">
        </td>
        <td>{{ $row->created_at->diffForHumans() }}</td>
        <td>
        <a href="/delete/{{ $row->id }}" class="btn btn-danger" onclick="return hapus();">Delete</a>
        <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info" >Edit</a>
        </td>
      </tr>
      @endforeach

      </tbody>
    </table>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>

  <script>
    function hapus(){
      return confirm('Anda yakin?');
    }
  </script>
</html>