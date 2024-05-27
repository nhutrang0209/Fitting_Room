using System;
using System.Collections.Generic;
using UnityEngine;

namespace Fitting_Room
{
    public class ClothingManager : MonoBehaviour
    {
        [Header("Full clothes")]
        [SerializeField] private List<Clothing> clothingInventory;
        private List<Clothing> CurClothList { get; set; }

        public List<Clothing> ClothingInventory => clothingInventory;
        
        private void Start()
        {
            CurClothList = new List<Clothing>();
        }

        public void PutOn(Clothing clothing)
        {
            TakeOffAllSameCategory(clothing);
            
            CurClothList.Add(clothing);
            
            clothing.PutOn();
        }

        private void TakeOffAllSameCategory(Clothing clothing)
        {
            foreach (var curClothing in CurClothList)
            {
                if (curClothing.Category == clothing.Category)
                    curClothing.TakeOff();
            }
        }

        public void TakeOff(Clothing clothing)
        {
            if (CurClothList.Contains(clothing))
            {
                CurClothList.Remove(clothing);
            }
            
            clothing.TakeOff();
        }

    }
}