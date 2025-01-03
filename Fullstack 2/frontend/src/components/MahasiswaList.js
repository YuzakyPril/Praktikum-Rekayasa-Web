import React, { useState, useEffect } from 'react';
import axios from 'axios';

const MahasiswaList = () => {
    const [mahasiswa, setMahasiswa] = useState([]);
    useEffect(() => {
        axios.get('http://127.0.0.1:8000/api/mahasiswa')
        .then(response => setMahasiswa(response.data))
        .catch(error => console.error(error));
    }, []);
    return (
        <div>
        <h2>Daftar Mahasiswa</h2>
        <ul>
            {mahasiswa.map((mhs) => (
                <li key={mhs.id}>
                    {mhs.nim} - {mhs.nama} - {mhs.fakultas}
                </li>
            ))}
        </ul>
        </div>
    );
};
export default MahasiswaList;