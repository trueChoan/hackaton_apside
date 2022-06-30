import React from "react";
import "../styles/filterpagebutton.css"

function SearchResult() {

    const url = 'http://localhost:8000/project/new'


return (
    <div className="searchingflex">
    <button className="addproject" onClick={() => window.open(url, '_blank')}><p className="addprojectp">Add a project</p></button>
    </div>
);




}

export default SearchResult;