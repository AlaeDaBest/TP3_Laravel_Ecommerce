import React from "react";
import { Link } from "react-router-dom";
import Home from "./Home";
import ProductsList from "./Product/ProductsList";
const Header=()=>{
    return(
        <header>
            <div>
                <h1>E-commerce</h1>
            </div>
            <nav>
                <Link to='/'  >Home</Link>
                <Link to='/products'  >Products</Link>
                <Link to='/'  >Customers</Link>
                <Link path='/'  >Orders</Link>
                <Link path='/' >Contact</Link>
            </nav>
        </header>
    )
}
export default Header;