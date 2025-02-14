import React from "react";
const Product=(props)=>{
    return(
            <tr>
                <td>{props.product.sku}</td>
                <td>{props.product.name}</td>
                <td>{props.product.price}</td>
                <td>{props.product.weight}</td>
                <td>{props.product.descriptions}</td>
                <td>.</td>
                <td>.</td>
                <td>{props.product.category}</td>
                <td>{props.product.create_date}</td>
                <td>{props.product.stock}</td>
            </tr>
    )
}
export default Product;