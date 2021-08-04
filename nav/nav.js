function create_menu(basepath)
{
	var base = (basepath == 'null') ? '' : basepath;

	document.write(
		'<table cellpadding="0" cellspaceing="0" border="0" style="width:98%"><tr>' +
		'<td class="td" valign="top">' +

		'<ul>' +
		'<li><a href="page/epresensi/home">ePresensi Home</a></li>' +
		'<li><a href="page/epresensi/panduan_penggunaan">Panduan Penggunaan Presensi</a></li>' +
		'</ul>' +

		'</td><td class="td_sep" valign="top">' +

		'<h3>Menu ePresensi</h3>' +
		'<ul>' +
		'<li><a href="page/epresensi/otomatis">ePresensi</a></li>' +
		'<li><a href="page/epresensi/jam_tambahan">Jam Tambahan</a></li>' +
		'</ul>' +

		'</td>'+
		'</td></tr></table>');
}