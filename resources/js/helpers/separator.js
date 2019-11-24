export function separatorAngka(angka) {
    var bilangan = angka;
	
    var	number_string = bilangan.toString(),
        sisa 	= number_string.length % 3,
        rupiah 	= number_string.substr(0, sisa),
        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
            
    if (ribuan) {
        var separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    
    // Cetak hasil
    return rupiah; // Hasil: 23.456.789
}
