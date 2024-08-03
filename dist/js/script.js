// Active Navbar
const activePage = window.location.pathname + window.location.search;
const navLinks = document.querySelectorAll('nav a').forEach((link) => {
	const linkPath = link.getAttribute('href');

	if (activePage === linkPath || activePage.includes(linkPath)) {
		link.classList.add('active');
	} else {
		link.classList.remove('active');
	}
});
// Active Navbar End

// Carousel Home
$('.carousel').carousel({
	interval: 3000,
});

$(document).ready(function () {
	$('#carousel-img').on('slid.bs.carousel', function () {
		// Remove highlight class from all carousel items
		$('.carousel-item').removeClass('active-carousel-item');

		// Get the currently active item
		var activeItem = $(this).find('.carousel-item.active');
		var heading = activeItem.data('heading');
		var text = activeItem.data('text');

		// Update text in desk-home-paragraf
		$('.desk-home-paragraf .bold-heading3').text(heading);
		$('.desk-home-paragraf .regular-heading6').text(text);

		// Add highlight class to the image on the left in the currently active item
		activeItem.find('.img-carousel-1.col-6:first-child').addClass('active-carousel-item');
	});

	// Initial setup to display text and highlight the first carousel item
	var initialHeading = $('.carousel-item.active').data('heading');
	var initialText = $('.carousel-item.active').data('text');
	$('.desk-home-paragraf .bold-heading3').text(initialHeading);
	$('.desk-home-paragraf .regular-heading6').text(initialText);
	$('.carousel-item.active .img-carousel-1.col-6:first-child').addClass('active-carousel-item');
});

// Update the following image based on the left image of the carousel
$(document).ready(function () {
	$('#carousel-img').on('slid.bs.carousel', function () {
		var leftImage = $(this).find('.carousel-item.active img').attr('src');
		$('.img1').attr('src', leftImage);
	});
});
// Carousel Home End

// Detail Job
const accordion = document.getElementsByClassName('contentBx');
for (let i = 0; i < accordion.length; i++) {
	accordion[i].addEventListener('click', function () {
		this.classList.toggle('active-accordion');
	});
}
// Detail Job End

// TV Schedule
function showPage(day) {
	// Semua elemen dengan kelas "list-acara" disembunyikan
	const allSchedules = document.querySelectorAll('.list-acara');
	allSchedules.forEach(function (schedule) {
		schedule.classList.remove('active');
	});

	// Menunjukkan elemen dengan id yang sesuai dengan hari yang dipilih
	const selectedSchedule = document.getElementById(day);
	if (selectedSchedule) {
		selectedSchedule.classList.add('active');
	}

	// Menyembunyikan semua elemen dengan kelas "current-day"
	const allDayButtons = document.querySelectorAll('.list-jadwal button');
	allDayButtons.forEach(function (button) {
		button.classList.remove('current-day');
	});

	// Menandai tombol yang sesuai dengan hari yang dipilih
	const selectedDayButton = document.querySelector('.list-jadwal button[data-day="' + day + '"]');
	if (selectedDayButton) {
		selectedDayButton.classList.add('current-day');
	}
}

// Otomatis memilih hari saat halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
	const today = new Date().getDay();
	const daysOfWeek = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

	// Memilih tombol sesuai dengan hari saat ini
	const defaultDay = daysOfWeek[today];
	showPage(defaultDay);

	// Tambahan: Tambahkan class 'active-day' ke .list-acara yang sesuai
	const selectedSchedule = document.getElementById(defaultDay);
	if (selectedSchedule) {
		selectedSchedule.classList.add('active-day');
	}
});
// TV Schedule End

// Alert
$(document).ready(function () {
	// Check if the status is 'success', 'failed', or 'alert'
	if (window.location.search.includes('status=success')) {
		// Display SweetAlert for success1 status
		Swal.fire({
			position: 'middle',
			icon: 'success',
			title: 'Data berhasil tersimpan.',
			showConfirmButton: false,
			timer: 3000,
		});
	} else if (window.location.search.includes('status=failed')) {
		// Display SweetAlert for failed1 status
		Swal.fire({
			icon: 'error',
			title: 'Error!',
			text: 'Data belum berhasil disimpan, mohon untuk mencoba beberapa saat lagi.',
			confirmButtonText: 'OK',
		});
	} else if (window.location.search.includes('status=alert')) {
		// Display SweetAlert for alert1 status
		Swal.fire({
			icon: 'warning',
			title: 'Warning!',
			text: 'Mohon untuk mengisikan data yang dibutuhkan dengan lengkap.',
			confirmButtonText: 'OK',
		});
	}
});
// Alert End
