<?php
/*
 * Description of tampil bursa kerja
 *
 * @author in
 */


    $this->load->database();
    $this->db->where('id',  $id);
    $query = $this->db->get('in_bursa');
    foreach ($query->result() as $row)
    {
?>
<table width="100%">
<tbody>
<tr style="font-size: 11px; font-weight: bold; min-height: 25px;">
<th style="padding: 1px 5px;" colspan="2">
<h2 style="color:#fff;"><?=$row->perusahaan;?> </h2>
</th>
</tr>
<tr style="vertical-align: top;">
<td style="padding: 5px 5px 5px 15px; border-bottom: 1px dashed #dddddd;" width="29%" ><span style="font-size: 12px; font-weight: bold;">
Posisi</span></td>
<td style="border-bottom: 1px dashed #dddddd;" width=""><span><?=$row->posisi;?></span></td>
</tr>

<tr style="vertical-align: top;">
<td style="padding: 5px 5px 5px 15px;" ><span style="font-size: 12px; font-weight: bold;">Alamat</span></td>
<td style="border-bottom: 1px dashed #dddddd;" width=""><span style="color: #686868;"><?=$row->alamat;?></span></td>
</tr>

<tr style="vertical-align: top;">
<td style="padding: 5px 5px 5px 15px;" ><span style="font-size: 12px; font-weight: bold;">Berlaku </span></td>
<td width=""><?=$row->tanggal_in.' s/d '.$row->tanggal_out;?></td>

<tr style="vertical-align: top;">
<td style="padding: 5px 5px 5px 15px;" ><span style="font-size: 12px; font-weight: bold;">Keterangan Persyaratan</span></td>
<td width=""><?=$row->keterangan;?></td>
</tr>
<tr style="font-size: 11px; font-weight: bold; min-height: 25px;">
    <td style="padding: 1px 5px;" colspan="2" align="center">
<a href="<?=base_url();?>index.php/user/bursa_kerja" class="more">Kembali &raquo;</a>
</td>
</tr>
</tbody>
</table>
<?php }?>
