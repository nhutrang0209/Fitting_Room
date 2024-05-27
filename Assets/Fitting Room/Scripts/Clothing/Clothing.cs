using System;
using UnityEngine;

namespace Fitting_Room
{
    public class Clothing : MonoBehaviour
    {
        [SerializeField] private ClothingData clothingData;

        public int ID => clothingData.ID;
        public ClothCategory Category => clothingData.Category;

        public event Action OnPutOn;

        public bool IsPutOn { get; set; }

        public void TakeOff()
        {
            gameObject.SetActive(false);
            IsPutOn = false;
        }

        public void PutOn()
        {
            gameObject.SetActive(true);
            IsPutOn = true;
            OnPutOn?.Invoke();
        }
    }
}