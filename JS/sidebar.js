// Sidebar Toggle
const sidebar = document.querySelector('#sidebar');
const showSidebar = document.querySelector('#show-sidebar');
const closeSidebar = document.querySelector('#close-sidebar');

function toggleSidebar() {
    sidebar.classList.toggle('collapsed');
}

showSidebar.onclick = toggleSidebar;
closeSidebar.onclick = toggleSidebar;

// Accordian Item Active Animation
jQuery(document).ready(function($) {
    var tabsVerticalInner = $('#accordian');
    
    function updateSelectorPosition(item) {
        const height = item.innerHeight();
        const width = item.innerWidth();
        const position = item.position();

        $(".selector-active").css({
            "top": position.top + "px",
            "left": position.left + "px",
            "height": height + "px",
            "width": width + "px"
        });
    }

    // Initial active item setup
    const activeItem = tabsVerticalInner.find('.active');
    if (activeItem.length > 0) updateSelectorPosition(activeItem);

    // Update on item click
    tabsVerticalInner.on("click", "li", function() {
        tabsVerticalInner.find('li').removeClass("active");
        $(this).addClass('active');
        updateSelectorPosition($(this));
    });
});

// Exit Button Confirmation
const exitBtn = document.getElementById("btnExit");
exitBtn.addEventListener("click", function() {
  if (exitBtn.classList.contains('active')) {
    alert('Are you sure?');
  }
});
