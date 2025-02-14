import React, { useEffect, useState } from "react";
// import api from "../../API/axios";
import axios from "axios";
import Product from "./Product";
import { Link, useNavigate } from "react-router-dom";

const ProductsList=()=>{
    const [products,setProducts]=useState([]);
    const [selectedFile,setSelectedFile]=useState(null);
    const navigate=useNavigate();
    useEffect(()=>{
        axios.get('/api/products')
           .then(response=>{
            console.log(response)
            setProducts(response.data);
           })
           .catch(error=>{
            console.error('There was en error fetching the products',error)
           });
    },[]);
    const HandleImport=async(e)=>{
        e.preventDefault();
        if(!selectedFile){
            alert('Select a CSV file');
            return;
        }
        const apiUrl = "http://127.0.0.1:8000/api/import";
        const formData=new FormData();
        formData.append('file',selectedFile);
        try {
            const response = await axios.post(apiUrl, formData, {
                headers: {
                "Content-Type": "multipart/form-data",
                },
            });
            console.log("Importing products went successfully:", response.data);
            alert(" Nice Import Alae !");
            navigate("/products"); 
        } catch (error) {
            if (error.response) {
                console.error("Server Error:", error.response.data);
                alert("Error importing product: " + error.response.data.message);
            } else if (error.request) {
                console.error("Network Error:", error.request);
                alert("Error: Unable to connect to the server.");
            } else {
                console.error("Error:", error.message);
                alert("An unexpected error occurred.");
            }
        }
    }
    const HandleExport=async(e)=>{
        e.preventDefault();
        try{
            const response=await axios.get('api/export',{responseType:'blob'});
            const blob=new Blob([response.data],{type:'application/vnd.ms-excel'});
            const url=window.URL.createObjectURL(blob);
            const link=document.createElement('a');
            link.href=url;
            link.setAttribute('download','products.xls');
            document.body.appendChild(link);
            link.click();
            link.remove();
            window.URL.revokeObjectURL(url);
        }catch(error){
            console.error('There was an error exporting the products',error);
            if (error.response) {
                // The request was made and the server responded with a status code
                // that falls out of the range of 2xx
                console.error("Server Error:", error.response.status, error.response.data);
            } else if (error.request) {
                // The request was made but no response was received
                // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                // http.ClientRequest in node.js
                console.error("Request Error:", error.request);
            } else {
                // Something happened in setting up the request that triggered an Error
                console.error("Setup Error:", error.message);
            }
        }
        // const apiUrl="/api/export";
        // axios.get('/api/export')
        // .then(response=>console.log(response))
        // .catch(error=>console.log('There was an error exporting the products',error))
    }
    return(
        <div>
            <section>
                <table border={1} rules="all" width="100%">
                    <tr>
                        <th>SKU</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Weight</th>
                        <th>Descriptions</th>
                        <th>Thumbnail</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Create Date</th>
                        <th>Stock</th>
                    </tr>
                {products.map(product=>(
                    <Product key={product.id} product={product} />
                ))}
                </table>
            </section>
            <section>
                <Link to='/addProduct' >Add Product</Link>
                <article>
                    <input type="file" onChange={(e)=>setSelectedFile(e.target.files[0])} />
                    <input type="submit" value="Import Products" onClick={HandleImport} />
                    <input type="submit" value="Export Products" onClick={HandleExport} />
                </article>
            </section>
        </div>
    )
}
export default ProductsList;