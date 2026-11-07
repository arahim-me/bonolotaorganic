// document.addEventListener('DOMContentLoaded', function () {

//     const searchInput = document.getElementById('messageSearch');
//     const messageItems = [...document.querySelectorAll('.message-item')];

//     const messageDetails = document.getElementById('messageDetails');
//     const emptyMessage = document.getElementById('emptyMessage');

//     const toggleReadBtn = document.getElementById('toggleReadBtn');
//     const noSearchResult = document.getElementById('noSearchResult');

//     let activeFilter = 'all';
//     let selectedMessage = null;

//     // Select Message
//     function selectMessage(item) {

//         selectedMessage = item;

//         messageItems.forEach(el => el.classList.remove('active'));

//         item.classList.add('active');

//         // Get Message Data
//         const name = item.dataset.name;
//         const email = item.dataset.email;
//         const subject = item.dataset.subject;
//         const message = item.dataset.message;
//         const avatar = item.dataset.avatar;
//         const date = item.dataset.date;

//         // Populate Details
//         document.getElementById('detailName').textContent = name;
//         document.getElementById('detailEmail').textContent = email;
//         document.getElementById('detailSubject').textContent = subject;
//         document.getElementById('detailMessage').textContent = message;
//         document.getElementById('detailDate').textContent = date;

//         // Avatar
//         const detailAvatar = document.getElementById('detailAvatar');
//         const placeholder = document.getElementById('detailAvatarPlaceholder');

//         if (avatar) {
//             detailAvatar.src = avatar;
//             detailAvatar.classList.remove('d-none');
//             placeholder.classList.add('d-none');
//         } else {
//             detailAvatar.classList.add('d-none');
//             placeholder.classList.remove('d-none');
//             placeholder.textContent = name.charAt(0).toUpperCase();
//         }

//         // Show Details
//         messageDetails.classList.remove('d-none');
//         emptyMessage.classList.add('d-none');

//         updateReadButton();

//         // Automatically mark as read when opened
//         if (item.dataset.isRead === '0') {
//             updateReadStatus(true);
//         }
//     }


//     // Update Read / Unread
//     function updateReadStatus(isRead) {

//         if (!selectedMessage) return;

//         selectedMessage.dataset.isRead = isRead ? '1' : '0';

//         selectedMessage.classList.toggle('is-read', isRead);
//         selectedMessage.classList.toggle('is-unread', !isRead);

//         updateReadButton();
//         applyFilters();
//     }


//     // Update Read Button
//     function updateReadButton() {

//         const isRead = selectedMessage.dataset.isRead === '1';

//         const detailStatus = document.getElementById('detailStatus');

//         if (isRead) {

//             toggleReadBtn.innerHTML =
//                 '<i class="bi bi-envelope me-1"></i> Mark as Unread';

//             detailStatus.textContent = 'Read';

//             detailStatus.className = 'badge bg-success';

//         } else {

//             toggleReadBtn.innerHTML =
//                 '<i class="bi bi-envelope-open me-1"></i> Mark as Read';

//             detailStatus.textContent = 'Unread';

//             detailStatus.className = 'badge bg-warning text-dark';

//         }
//     }


//     // Button Click
//     toggleReadBtn.addEventListener('click', function () {

//         if (!selectedMessage) return;

//         const isRead = selectedMessage.dataset.isRead === '1';

//         updateReadStatus(!isRead);

//     });


//     // Sidebar Click
//     messageItems.forEach(item => {

//         item.addEventListener('click', function () {

//             selectMessage(this);

//         });

//     });


//     // Search + Filter
//     function applyFilters() {

//         const keyword = searchInput.value.toLowerCase().trim();

//         let visibleCount = 0;

//         messageItems.forEach(item => {

//             const searchData = [

//                 item.dataset.name,
//                 item.dataset.email,
//                 item.dataset.subject,
//                 item.dataset.message

//             ].join(' ').toLowerCase();

//             const matchesSearch = searchData.includes(keyword);

//             const isRead = item.dataset.isRead === '1';

//             let matchesFilter = true;

//             if (activeFilter === 'unread') {
//                 matchesFilter = !isRead;
//             }

//             if (activeFilter === 'read') {
//                 matchesFilter = isRead;
//             }

//             const visible = matchesSearch && matchesFilter;

//             item.classList.toggle('d-none', !visible);

//             if (visible) {
//                 visibleCount++;
//             }

//         });

//         noSearchResult.classList.toggle(
//             'd-none',
//             visibleCount !== 0
//         );

//     }


//     // Search Input
//     searchInput.addEventListener('input', applyFilters);


//     // Filter Buttons
//     document.querySelectorAll('.filter-btn').forEach(button => {

//         button.addEventListener('click', function () {

//             document.querySelectorAll('.filter-btn').forEach(btn => {

//                 btn.classList.remove('btn-primary', 'active');
//                 btn.classList.add('btn-outline-secondary');

//             });

//             this.classList.remove('btn-outline-secondary');
//             this.classList.add('btn-primary', 'active');

//             activeFilter = this.dataset.filter;

//             applyFilters();

//         });

//     });


//     // Select First Message Automatically
//     const firstMessage = messageItems.find(item =>
//         !item.classList.contains('d-none')
//     );

//     if (firstMessage) {
//         selectMessage(firstMessage);
//     }

// });
