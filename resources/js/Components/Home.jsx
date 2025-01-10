import React from "react";
import Header from "./Header";
import Footer from "./Footer";
import ProductsList from "./Product/ProductsList";
import { Route, Routes } from "react-router-dom";
const Home=()=>{
    return(
        <div>
            <Header/>
            <main>
                <h1>Yahoo</h1>              
            </main>
            <Footer/>
        </div>
    )
}
export default Home;