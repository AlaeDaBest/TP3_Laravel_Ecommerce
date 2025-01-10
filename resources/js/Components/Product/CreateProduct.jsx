import React from "react";
const CreateProduct=()=>{
    return(
        <form action="products.store">
            <label htmlFor="">Product Name :</label>
            <input type="text" name="name" />
            <label htmlFor="">Product Price :</label>
            <input type="text" name="price" />
            <label htmlFor="">Product Weight :</label>
            <input type="text" name="weight" />
            <label htmlFor="">Product Descriptions :</label>
            <input type="text" name="descriptions" />
            <label htmlFor="">Product Thumbnail :</label>
            <input type="text" name="thumbnail" />
            <label htmlFor="">Product Image :</label>
            <input type="file" name="image" />
            <label htmlFor="">Product Stock :</label>
            <input type="file" name="stock" />
        </form>
    )
}
export default CreateProduct;