import React, { useEffect, useState } from "react";
// import api from "../../API/axios";
import axios from "axios";
import Product from "./Product";
import { Link } from "react-router-dom";

const ProductsList=()=>{
    const [products,setProducts]=useState([]);
    useEffect(()=>{
        axios.get('/products')
           .then((response)=>{
            console.log(response)
            setProducts(response.data);
           })
           .catch(error=>{
            console.error('There was en error fetching the products',error)
           });
    },[]);
    return(
        <div>
            <section>
                {products.map(product=>(
                    <Product key={product.id} product={product} />
                ))}
            </section>
            <section>
                <Link to='/addProduct' >Add Product</Link>
            </section>
        </div>
    )
}
export default ProductsList;