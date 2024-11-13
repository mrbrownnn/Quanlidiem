@extends('../admin_layout')
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Lịch Học</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang Chủ</a></li>
          <li class="breadcrumb-item active">Lịch Học</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection

@section('admin_content')
<iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FHo_Chi_Minh&amp;src=ZGluaG5hbXNha2VyQGdtYWlsLmNvbQ&amp;src=cjI1MDdzZW9kODd1M2k5aW5nM2JlY2Y0MnNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=bGdkZDg2Z2tocmIxMTRodHVtNHBzdm9tdmdAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=amZob2JpczRkdm40dWEyY3FkNWZia3JvdXNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=Y2xhc3Nyb29tMTA3MDk3MzIxNzQ0MDEwNjI4OTA5QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&amp;src=dmkudmlldG5hbWVzZSNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;color=%23039BE5&amp;color=%23AD1457&amp;color=%23A79B8E&amp;color=%238E24AA&amp;color=%237627bb&amp;color=%230B8043&amp;color=%2333B679" style="border:solid 1px #777" width="1250" height="600" frameborder="0" scrolling="no"></iframe>
@endsection