import './bootstrap';
import '../css/app.css';

import ReactDOM from 'react-dom/client';
import Home from './Components/Home';
import { HashRouter, Route, Router, Routes } from 'react-router-dom';
import ProductsList from './Components/Product/ProductsList';

ReactDOM.createRoot(document.getElementById('app')).render(
<HashRouter>
    <Routes>
        <Route path="/" element={<Home/>} />
        <Route path="/products" element={<ProductsList/>} />
        <Route path="/addProduct" element='' />
    </Routes>
</HashRouter>
);