using UnityEngine;
using UnityEngine.UI;

namespace Fitting_Room
{
    public class UIAdjustPart : UIShowHide
    {
        [SerializeField] private Button hideButton;

        protected override void Start()
        {
            base.Start();
            hideButton.onClick.AddListener(OnHideClick);
        }

        private void OnHideClick()
        {
            Hide();
        }
    }
}