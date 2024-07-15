// Dusplay side bar menu dropdwon

$('.sideBarMenuItem').click(function(e) {
    e.preventDefault();
    $(this).next().slideToggle('slow');
});

