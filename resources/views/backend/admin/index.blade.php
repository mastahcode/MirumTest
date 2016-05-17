@extends('masterTemplates.masterTemplates')

<div style="padding-top: 3%" class="col-lg-6 col-lg-offset-3">
    <h2>Ini halaman khusus admin</h2>
    <h3>Welcome {{Auth::user()->nama}}</h3>

</div>