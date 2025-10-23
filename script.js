const mulaiBtn = document.getElementById('mulaiBtn');
  const backBtn = document.getElementById('backBtn');
  const loginPage = document.getElementById('loginPage');
  const sections = document.querySelectorAll('section:not(.login-page)');
  const profileBtn = document.querySelector('.btn-primary'); // Tombol profile atas
  const form = document.getElementById('loginForm');

  // Tombol "Mulai Sekarang"
  mulaiBtn.addEventListener('click', () => {
    sections.forEach(sec => sec.style.display = 'none');
    loginPage.style.display = 'flex';
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  // Tombol "Kembali"
  backBtn.addEventListener('click', () => {
    loginPage.style.display = 'none';
    sections.forEach(sec => sec.style.display = 'block');
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  // Simpan data ke localStorage
  form.addEventListener('submit', (e) => {  
    e.preventDefault();
    const email = form.querySelector('input[type="email"]').value;
    const nickname = form.querySelector('input[type="text"]').value;
    const phone = form.querySelector('input[type="tel"]').value;

    const userData = { email, nickname, phone };
    localStorage.setItem('userProfile', JSON.stringify(userData));

    alert('Data kamu sudah disimpan ');
    loginPage.style.display = 'none';
    sections.forEach(sec => sec.style.display = 'block');
  });

  // Halaman profil 
  profileBtn.addEventListener('click', () => {
    const data = JSON.parse(localStorage.getItem('userProfile'));
    if (!data) {
      alert('Isi dulu datanya lewat tombol "Mulai Sekarang" yaa');
      return;
    }

    const profilePopup = document.createElement('div');
    profilePopup.classList.add('profile-popup');
    profilePopup.innerHTML = `
      <div class="profile-card">
        <button class="close-btn">&times;</button>
        <h2>Profil raratii</h2>
        <p><strong>Email:</strong> ${data.email}</p>
        <p><strong>Nickname:</strong> ${data.nickname}</p>
        <p><strong>No. HP:</strong> ${data.phone}</p>
      </div>
    `;
    document.body.appendChild(profilePopup);

    document.querySelector('.close-btn').addEventListener('click', () => {
      profilePopup.remove();
    });
  });