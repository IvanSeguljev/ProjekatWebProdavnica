<!doctype html>
@extends('layouts.app')

@section('content')
<body>
    <div class="col-md-8 center-block" style="margin: 0 auto;">
        <div id="print">
        <div class="row">
            <h2 style="margin-bottom: 20px;">Broj racuna: {{$racun->id}}</h2>
    
        </div>
    
    <div class="row">
    <ul class="list-group col-md-12">
        @foreach($stavke as $stavka)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$stavka->nazivProizvoda}}
            
            <div>Kolicina: {{$stavka->kolicina}}</div>
        </li>
        @endforeach
    </ul>
        
    </div>
        <br>
        <div class="row">
            <div class="col-md-6 text-left">
            <h5>Ukupna cena: {{$racun->ukupanIznos}}</h5>
            </div>
            <div class="col-md-6 text-right">
            <p><strong>Racun izdat:</strong> {{$racun->created_at}}</p>
            </div>
        </div>
        </div>
        <div class="row">
            <button class="btn btn-primary col-md-3" onclick="printElem('print');">print</button>
        </div>
            
            
            
        
    </div>
    <script>
        function printElem(divId) {
    var content = document.getElementById(divId).innerHTML;
    var mywindow = window.open('', 'Print', 'height=600,width=800');

    mywindow.document.write('<html><head><title>Print</title>');
    mywindow.document.write('</head><body><div style="border: 1px solid black; margin:auto; width:35%; text-align:left; padding:10px;">');
    mywindow.document.write(content);
    mywindow.document.write('</div></body></html>');

    mywindow.document.close();
    mywindow.focus();
    mywindow.print();
    mywindow.close();
    return true;
}
    </script>
        
</body>
@endsection