import React from "react";
import "../styles/filterpagebutton.css"


function OrderBy() {
    return (
        <div class="select-box">
            <div class="select-box__current" tabindex="1">
                <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="1" value="2" name="Ben" checked="checked" />
                    <p class="select-box__input-text">Date</p>
                </div>
                <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="2" value="3" name="Ben" checked="checked" />
                    <p class="select-box__input-text">Progress</p>
                </div>
                <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="3" value="4" name="Ben" checked="checked" />
                    <p class="select-box__input-text">Collaborator</p>
                </div>
                <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="4" value="5" name="Ben" checked="checked" />
                    <p class="select-box__input-text">Order by :</p>
                </div><img class="select-box__icon" src="https://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true" />
            </div>
            <ul class="select-box__list">
                <li>
                    <label class="select-box__option" for="1" aria-hidden="aria-hidden">Date</label>
                </li>
                <li>
                    <label class="select-box__option" for="2" aria-hidden="aria-hidden">Progress</label>
                </li>
                <li>
                    <label class="select-box__option" for="3" aria-hidden="aria-hidden">Collaborator</label>
                </li>
            </ul>
        </div>
    );
}

export default OrderBy;