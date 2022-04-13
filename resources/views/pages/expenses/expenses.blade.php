@extends('layouts.main')

@section('gate')

<!-- ISI -->

<br><br>

<div class="tabheader">

    {{-- HEADING --}}
    <h1>My Expense Category</h1>

    {{-- SUMMARY --}}
    <h4>Pada page ini berisi seluruh category pencatatan <br> keuangan pada PT. Tolichris</h4>
</div>

    {{--  
    |--------------------------------------------------------------------------
    | My Expense Category
    |--------------------------------------------------------------------------
    |
    | Pada page ini berisi seluruh category pencatatan
    | keuangan pada PT. Tolichris
    |
    --}}
    
        <div class="tabaddnew">
            <button>Add new income +</button>
        </div>

        <div class="clear"></div>
    

            <div class="tabcategory">
                {{-- SEARCH FEATURE --}}
                <div class="tabsearch">
                    <p>Search: <input type="text" placeholder="search . ."></p>
                </div>

                {{-- SHOWING ENTRIES --}}
                <p>Show {{ 1 }} entries </p> 

                {{-- TABLE --}}
                    <div class="tabtable">    
                        <table width="100%">
                            <tr>
                                {{-- TABLE HEADER --}}
                                <th><center>No</center></th> 
                                <th><center>ID</center></th>
                                <th><center>Category Name / Nama Kategori</center></th>
                                <th><center>Jenis Kas</center></th>
                                <th><center>Date</center></th>
                                <th><center>Total</center></th>
                                <th><center>Action</center></th>
                            </tr>

                            <tr>
                                {{-- LINE CUTTER --}}
                                <td colspan="7"><div class="line"></div></td>
                            </tr>
                    
                                {{-- FOR EACH --}}
                                @foreach ($categories as $category) 
                                    <tr>
                                        {{-- TABLE MAIN SECTION --}}
                                        <td> <center> {{ $number++ }}. </center></td>
                                        <td> <center> {{ "24592" }} </center></td>
                                        <td>{{ $category->name }}</td>
                                        <td><center>{{ "Kas Kecil" }}</center></td>
                                        <td><center>{{ $category->created_at }}</center></td>
                                        <td>
                                            <center>

                                                {{-- PERHITUNGAN  --}}
                                                    
                                                @foreach ( $expenses as $calculate )

                                                    @if ($category->name === $calculate->expense_category->name)
                                                        
                                                        @php
                                                            $subtotal = $subtotal + $calculate->nominal
                                                        @endphp

                                                    @endif

                                                @endforeach


                                                
                                                Rp. {{ $subtotal }},00

                                                @php

                                                $subtotal = 0;

                                                @endphp

                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <button><img src="/img/eye_white.png" alt=""></button> 
                                                <button><img src="/img/pencil_white.png" alt=""></button> 
                                                <button><img src="/img/trash_white.png" alt=""></button>
                                            </center>
                                        </td>
                                    </tr>

                                    <tr>
                                        {{-- SPACER --}}
                                        <td><div class="space"></div></td>
                                    </tr>

                                @endforeach
                                <tr>
                                    <td colspan="99"><hr></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td><center><b>Total : </b></center></td>
                                    <td>
                                        @foreach ( $expenses as $expense )
                                        
                                        @php 
                                            $total = $total + $expense->nominal
                                        @endphp

                                        @endforeach
                                        <center>
                                            Rp.{{ $total }},00
                                        </center>
                                        
                                    </td>
                                </tr>

                        </table>
                    </div> 
                <br>

                {{-- ENTRIES --}}
                <p>Showing 1 to {{ 1 }} of {{ $number - 1 }} entries</p>

                @php
                                
                $number = 1;

                @endphp

                
            </div>

    <br><br>

    {{--  
    |--------------------------------------------------------------------------
    | My Expense Overview
    |--------------------------------------------------------------------------
    |
    | Pada page ini berisi seluruh transaksi catatan pendapatan yang telah masuk pada PT Tolichris
    |
    --}}

    <div class="tabheader">

        {{-- HEADING --}}
        <h1>My Expense Overview</h1>

        {{-- SUMMARY --}}
        <h4>Pada page ini berisi seluruh transaksi catatan pendapatan yang telah masuk pada PT Tolichris</h4>
    </div>

        <div class="tabaddnew">
            <button>Add new income +</button>
        </div>

        <div class="clear"></div>

            <div class="tabcategory">
                {{-- SEARCH FEATURE --}}
                <div class="tabsearch">
                    <p>Search: <input type="text" placeholder="search . ."></p>
                </div>
            
                {{-- SHOWING ENTRIES --}}
                <p>Show {{ 1 }} entries </p> 

            
                    {{-- TABLE --}}
                    <div class="tabtable">    
                        <table width="100%">
                            <tr>
                                {{-- TABLE HEADER --}}
                                <th><center>No</center></th> 
                                <th><center>ID</center></th>
                                <th><center>Expense Detail / Detail Pemasukan</center></th>
                                <th><center>Category / Kategori</center></th>
                                <th><center>Kas besar / Kas kecil</center></th>
                                <th><center>Nominal</center></th>
                                <th><center>Date</center></th>
                                <th><center>Action</center></th>
                            </tr>
                            <tr>
                                {{-- LINE CUTTER --}}
                                <td colspan="99"><div class="line"></div></td>
                            </tr>
                        
                                {{-- EACH FOR --}}
                                @foreach ($expenses as $expense) 
                            <tr>
                                {{-- TABLE MAIN SECTION --}}
                                <td> <center> {{ $number++ }}. </center></td>
                                    <td> <center> {{ "24592" }} </center></td>
                                    <td>{{ $expense->expense_description }}</td>
                                    <td><center>{{ $expense->expense_category->name }}</center></td>
                                    <td><center>{{ "Kas Kecil" }}</center></td>
                                    <td><center>Rp. {{ $expense->nominal }},00</center></td>
                                    <td><center>{{ $expense->created_at }}</center></td>
                                    <td>
                                        <center>
                                            <button><img src="/img/eye_white.png" alt=""></button> 
                                            <button><img src="/img/pencil_white.png" alt=""></button> 
                                            <button><img src="/img/trash_white.png" alt=""></button>
                                        </center>
                                </td>
                            </tr>
                        
                            <tr>
                                {{-- SPACER --}}
                                <td><div class="space"></div></td>
                            </tr>

                            @endforeach
                        
                        </table>
                    </div> 
        <br>

        {{-- ENTRIES --}}
        <p>Showing 1 to {{ 1 }} of {{ $number - 1 }} entries</p>
    </div>

        
@endsection



