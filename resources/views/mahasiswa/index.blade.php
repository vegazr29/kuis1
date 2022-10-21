@extends('layout.main')
@section('title', 'Data Mahasiswa')


@section('container')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1 class="mt-3">Data Mahasiswa</h1>

                <?php
            $student_data = DB::select("SELECT * FROM student_data WHERE student_id = '03081200029'");
            foreach($student_data as $data){
                $student_id = $data->student_id;
                $name = $data->nama;
                $term = $data->term;
                $total_sks = $data->total_sks;
                echo "
                    <div class='container' style='background:cyan;'>
                        <div class='row'>
                            <div class='col-2'>
                                Nama: 
                            </div>
                            <div class='col-4'>
                                $name
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-2'>
                                NIM: 
                            </div>
                            <div class='col-4'>
                                $student_id
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-2'>
                                Term: 
                            </div>
                            <div class='col-4'>
                                $term
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-2'>
                                Total SKS: 
                            </div>
                            <div class='col-4'>
                                $total_sks
                            </div>
                        </div>
                    </div>
                ";
            };
        ?>

        <h6>Mata Kuliah yang diambil</h6>
        <table class="table table-dark">
            <tr>
                <th>No. </th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
            </tr>
            <?php
                $detail_major_data = DB::select("SELECT * FROM student_detail_major WHERE student_id = '03081200029'");
                $jumlahsks = DB::select("SELECT * FROM student_data WHERE student_id = '03081200029'");
                $no = 1;
                foreach($detail_major_data as $major){
                    $major_code = $major->kode;
                    $major_name = $major->name;
                    $sks = $major->sks;
                    echo "
                        <tr>
                            <td>$no</td>
                            <td>$major_code</td>
                            <td>$major_name</td>
                            <td>$sks</td>
                        </tr>
                    ";
                    $no++;
                }
                    
                    foreach($jumlahsks as $totalsks){
                       $jlhsks = $totalsks->total_sks;
                       echo "
                       <tr> <span style=float:right> 
                           <td></td><td> </td> <td> </td>
                           <td><span style=float:center> <b>jumlah sks = </b>$jlhsks</td>
                           </span>
                           </span>
                       </tr>
                   ";
                    }
                
            ?>
        </table>
@endsection

    
  
