import React from 'react';
import './App.css';
import MahasiswaList from './components/MahasiswaList.js';
import MahasiswaForm from './components/MahasiswaForm.js';

function App() {
  return (
    <div className="App">
    <h1>CRUD Mahasiswa</h1>
    <MahasiswaForm />
    <MahasiswaList />
    </div>
  );
}
export default App;