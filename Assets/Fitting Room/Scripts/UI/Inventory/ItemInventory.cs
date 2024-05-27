using System;
using TMPro;
using Unity.VisualScripting;
using UnityEngine;
using UnityEngine.Serialization;
using UnityEngine.UI;

namespace Fitting_Room
{
    public class ItemInventory : MonoBehaviour
    {
        [Header("Button")]
        [SerializeField] private Button itemButton;

        [Header("Ui data")]
        [SerializeField] private TextMeshProUGUI nameTxt;
        [SerializeField] private Image itemIcon;

        [Header("Dressed Icon")] 
        [SerializeField] private GameObject dressedGo;

        private Player Player => Player.Instance;

        
        public Clothing Clothing { get; set; }

        private void Start()
        {
            itemButton.onClick.AddListener(OnItemClick);
        }

        public void SetData(ClothingData data)
        {
            nameTxt.text = data.ClothName;
            itemIcon.sprite = data.ClothSprite;
            Clothing = FindClothingWithId(data.ID);
        }
        
        private Clothing FindClothingWithId(int id)
        {
            foreach (var clothing in Player.ClothingInventory)
            {
                if (clothing.ID == id)
                    return clothing;
            }

            return null;
        }

        private void OnItemClick()
        {
            ChangeState();
        }

        private void ChangeState()
        {
            if (Clothing.IsPutOn)
            {
                SetNotDressed();
                Player.TakeOff(Clothing);
            }
            else
            {
                SetDressed();
                Player.PutOn(Clothing);
            }
        }

        private void SetDressed()
        {
            dressedGo.SetActive(true);
        }

        public void SetNotDressed()
        {
            dressedGo.SetActive(false);
        }
    }
}