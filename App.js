import React from 'react';
import './App.css';

const MITWPUHome = () => {
  const youtubeVideos = [
    'https://www.youtube.com/embed/2dqyynCby-c?si=AxW1V_AxXYVtFYR_',
    'https://www.youtube.com/embed/4EUrU_9d2Mc?si=DaieAsJitojAC2yt',
    'https://www.youtube.com/embed/mtzoNhk4q3k?si=uCNdCvM9jmyn7PPX',
    'https://www.youtube.com/embed/bwlL1qI_Q4U?si=sXHtZ1iy72nakxvt',
    'https://www.youtube.com/embed/2wStoBs22fA?si=pBTOudqJyEXDJ7SI',
    'https://www.youtube.com/embed/RS1BxHjTpGU?si=F4mP8AXXkU1Ja06q',
  ];

  const handleLogout = () => {
    // Add your logout logic here
    console.log('Logout clicked');
  };

  return (
    <div className="App">
      <header style={{ marginBottom: '20px' }}>
        <nav>
          <div className="navbar">
            <img
              src="img/img5.png"
              alt="Logo"
              width={250}
              height={55}
              className="mr-2"
              href="https://mitwpu.edu.in/"
            />
            <a href="https://mitwpu.edu.in/" target="_blank"></a>
          </div>

          <div className="menu">
            <ul>
              <li className="active">
                <a href="#">Home</a>
              </li>
              <li>
                <a href="campus.html">Campus</a>
              </li>
              <li>
                <a href="#">Clubs</a>
              </li>
              <li>
                <a href="#">Events</a>
              </li>
              <li>
                <a href="#">Departments</a>
              </li>
              <li>
                <a href="#">About Us</a>
              </li>
            </ul>
          </div>

          <div className="button-group">
            <div className="contact_btn">
              <a href="https://mitwpu.edu.in/">Contact Us</a>
            </div>

            <button onClick={handleLogout} className="contact_btn logout-btn">
            <a href="http://localhost/fsdproject/login.php">Logout</a>
              
            </button>
          </div>
        </nav>
      </header>

      <main>
        <div
          className="grid-container"
          style={{
            display: 'grid',
            gridTemplateColumns: 'repeat(auto-fill, minmax(300px, 1fr))',
            gap: '40px',
            maxWidth: '1200px',
            margin: '0 auto',
          }}
        >
          {youtubeVideos.map((video, index) => (
            <div
              className="grid-item"
              key={index}
              style={{
                width: '100%',
                borderRadius: '8px',
                overflow: 'hidden',
                boxShadow: '0 0 10px rgba(0, 0, 0, 0.1)',
              }}
            >
              <iframe
                width="400"
                height="415"
                src={video}
                frameBorder="0"
                allowFullScreen
                style={{ width: '100%', height: '100%' }}
              />
            </div>
          ))}
        </div>
      </main>
    </div>
  );
};

export default MITWPUHome;

