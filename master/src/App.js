import React, { useState } from 'react';
import './App.css';
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import Header from './components/Header'
import CustomerForm from './pages/CustomerForm'
import AdminForm from './pages/AdminForm'
import Login from './pages/Login'
import Button from '@mui/material/Button'
import { Paper } from '@mui/material'


function App() {
  //const [token, setToken] = useState();

  //if(!token) {
  //  return <Login setToken={setToken} />
  //}



  

  return (
    <div className="wrapper">
      <Header />
      <BrowserRouter>
        <Routes>
          <Route exact path="/customer" element={<CustomerForm />} />
          <Route exact path="/admin" element={<AdminForm />} />
        </Routes>
      </BrowserRouter>
    </div>

  );
}

export default App;
