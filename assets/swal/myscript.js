const flashData = $('.flash-data').data('flashdata');
if (flashData) {
  Swal.fire({
    title: flashData + ' Sukses',
    text: '',
    type: 'success'
  });
}
