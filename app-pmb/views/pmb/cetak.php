<?php
$biodata=$this->model_crud->selectData('calonsiswa',array('nodaf'=>$this->uri->segment(3)))->row_array();
$ijazah=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'ijazah','nodaf'=>$this->uri->segment(3)))->row_array();
$skhu=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'skhu','nodaf'=>$this->uri->segment(3)))->row_array();
$foto=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'foto','nodaf'=>$this->uri->segment(3)))->row_array();
$ktp=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'ktp','nodaf'=>$this->uri->segment(3)))->row_array();
$bukti_bayar=$this->model_crud->selectData('dokumen_pmb',array('jenis_dokumen'=>'bukti_bayar','nodaf'=>$this->uri->segment(3)))->row_array();
 ?>
<center>
<?php if (!empty($ijazah)){ ?>

<?php } else { ?>
<b>Data belum diunggah</b>
<?php } ?>
<br />
<button class="btn btn-primary" onClick="print()">Cetak</button>
</center>
